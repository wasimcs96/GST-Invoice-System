<?php

namespace App\Models;

use App\Traits\HasCustomFields;
use App\Traits\HasTax;
use App\Traits\UUIDTrait;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Estimate extends Model
{
    use UUIDTrait;
    use HasTax;
    use HasCustomFields;

    const STATUS_DRAFT = 'DRAFT';
    const STATUS_SENT = 'SENT';
    const STATUS_VIEWED = 'VIEWED';
    const STATUS_EXPIRED = 'EXPIRED';
    const STATUS_ACCEPTED = 'ACCEPTED';
    const STATUS_REJECTED = 'REJECTED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estimate_date',
        'expiry_date',
        'estimate_number',
        'customer_id',
        'company_id',
        'reference_number',
        'discount_type',
        'discount_val',
        'status',
        'sub_total',
        'total',
        'notes',
        'private_notes',
        'tax_per_item',
        'discount_per_item',
        'attachment',
    ];

    /**
     * Automatically cast date attributes to Carbon
     * 
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'estimate_date',
        'expiry_date'
    ];

    /**
     * Automatically cast attributes to given types
     * 
     * @var array
     */
    protected $casts = [
        'sub_total' => 'integer',
        'total' => 'integer',
        'discount_val' => 'integer',
        'tax_per_item' => 'boolean',
        'discount_per_item' => 'boolean',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['fields'];

    /**
     * Define Relation with EstimateItem Model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(EstimateItem::class);
    }

    /**
     * Define Relation with Customer Model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
 
    /**
     * Define Relation with Company Model
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the Total Percentage of Estimate Taxes
     * 
     * @return int
     */
    public function getTotalPercentageOfTaxes()
    {
        $total = 0;
        foreach ($this->taxes as $tax) {
            $total += $tax->tax_type->percent;
        }

        return (int) $total;
    }

    /**
     * Get the Total Percentage of Estimate Taxes with Tax Names
     * 
     * @return array 
     */
    public function getTotalPercentageOfTaxesWithNames()
    {
        $total = [];
        foreach ($this->taxes as $tax) {
            if (isset($total[$tax->tax_type->name])) {
                $total[$tax->tax_type->name] += $tax->tax_type->percent;
            } else {
                $total[$tax->tax_type->name] = $tax->tax_type->percent;
            }
        }

        return $total;
    }

    /**
     * Get the Items Sub Total by base price
     * 
     * @return array 
     */
    public function getItemsSubTotalByBasePrice()
    {
        $sub_total = 0;
        foreach ($this->items as $item) {
            $sub_total += $item->price;
        }

        return $sub_total;
    }

    /**
     * Get the Total Percentage of Invoice Items Taxes with Tax Names
     * 
     * @return array 
     */
    public function getItemsTotalPercentageOfTaxesWithNames()
    {
        $total = [];
        foreach ($this->items as $item) {
            foreach ($item->taxes as $tax) {
                if (isset($total[$tax->tax_type->name . ' (' . $tax->tax_type->percent . '%)'])) {
                    $total[$tax->tax_type->name . ' (' . $tax->tax_type->percent . '%)'] += ($tax->tax_type->percent / 100) * $item->price;
                } else {
                    $total[$tax->tax_type->name . ' (' . $tax->tax_type->percent . '%)'] = ($tax->tax_type->percent / 100) * $item->price;
                }
            }
        }
        return $total;
    }

    /**
     * Get the Total Percentage of Invoice Items Taxes with Tax Names
     * 
     * @return array 
     */
    public function getItemsTotalDiscount()
    {
        $discount_amount = 0;
        foreach ($this->items as $item) {
            $price = $item->price;
            foreach ($item->taxes as $tax) {
                $price += ($tax->tax_type->percent / 100) * $item->price;
            }
            $discount_amount += ($item->discount_val / 100) * $price;
        }
        return $discount_amount;
    }

    /**
     * Customized strpos helper function for excluding prefix 
     * from estimate number
     * 
     * @param string $haystack
     * @param string $needle
     * @param int $number
     * 
     * @return string
     */
    private function strposX($haystack, $needle, $number)
    {
        if ($number == '1') {
            return strpos($haystack, $needle);
        } elseif ($number > '1') {
            return strpos(
                $haystack,
                $needle,
                $this->strposX($haystack, $needle, $number - 1) + strlen($needle)
            );
        } else {
            return error_log('Error: Value for parameter $number is out of range');
        }
    }
 
    /**
     * Helper function for getting the next Estimate Number
     * by searching the database and increase 1
     * 
     * @param string $prefix
     * 
     * @return string
     */
    public static function getNextEstimateNumber($company_id, $prefix)
    {
        // Get the last created order
        $lastOrder = Estimate::findByCompany($company_id)->where('estimate_number', 'LIKE', $prefix . '-%')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$lastOrder) {
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.
            $number = 0;
        } else {
            $number = explode("-", $lastOrder->estimate_number);
            $number = $number[1];
        }

        // If we have EST-000001 in the database then we only want the number
        // So the substr returns this 000001

        // Add the string in front and higher up the number.
        // the %05d part makes sure that there are always 6 numbers in the string.
        // so it adds the missing zero's when needed.

        return sprintf('%06d', intval($number) + 1);
    }

    /**
     * Helper function for converting Estimate to an Invoice
     * 
     * @return Invoice
     */
    public function convertToInvoice()
    {
        $currentCompany = $this->company;

        $invoice_date = Carbon::now();
        $due_date = Carbon::now()->addDays(7);

        // Get next Invoice number if the auto generation option is enabled
        $invoice_prefix = $currentCompany->getSetting('invoice_prefix');
        $next_invoice_number = Invoice::getNextInvoiceNumber($currentCompany->id, $invoice_prefix);
        
        // Save Invoice to Database
        $invoice = Invoice::create([
            'invoice_date' => $invoice_date->format('Y-m-d'),
            'due_date' => $due_date->format('Y-m-d'),
            'invoice_number' => $invoice_prefix . "-" . $next_invoice_number,
            'reference_number' => $this->reference_number,
            'customer_id' => $this->customer_id,
            'company_id' => $currentCompany->id,
            'status' => Invoice::STATUS_DRAFT,
            'paid_status' => Invoice::STATUS_UNPAID,
            'sub_total' => $this->sub_total,
            'discount_type' => 'percent',
            'discount_val' => $this->discount_val ?? 0,
            'total' => $this->total,
            'due_amount' => $this->total,
            'notes' => $this->notes,
            'private_notes' => $this->private_notes,
            'tax_per_item' => $this->tax_per_item,
            'discount_per_item' => $this->discount_per_item,
        ]);

        // Add products (invoice items)
        foreach ($this->items as $invoice_item) {
            $item = $invoice->items()->create([
                'product_id' => $invoice_item->product_id,
                'company_id' => $currentCompany->id,
                'quantity' => $invoice_item->quantity,
                'discount_type' => 'percent',
                'discount_val' => $invoice_item->discount_val,
                'price' => $invoice_item->price,
                'total' => $invoice_item->total,
            ]);

            if ($invoice_item->taxes) {
                foreach ($invoice_item->taxes as $tax) {
                    if ($tax) {
                        $item->taxes()->create([
                            'tax_type_id' => $tax->tax_type_id
                        ]);
                    }
                }
            }
        }

        // If Invoice based taxes are given
        if ($this->taxes) {
            foreach ($this->taxes as $tax) {
                $invoice->taxes()->create([
                    'tax_type_id' => $tax->tax_type_id
                ]);
            }
        }

        return $invoice;
    }

    /**
     * Set estimate_num attribute
     *
     * @return int
     */
    public function getEstimateNumAttribute()
    {
        $position = $this->strposX($this->estimate_number, "-", 1) + 1;
        return substr($this->estimate_number, $position);
    }

    /**
     * Set estimate_prefix attribute
     * 
     * @return string
     */
    public function getEstimatePrefixAttribute ()
    {
        return $this->id 
            ? explode("-", $this->estimate_number)[0]
            : CompanySetting::getSetting('estimate_prefix', $this->company_id);
    }

    /**
     * Set currency attribute from customer
     *
     * @return App\Model\Currency
     */
    public function getCurrencyAttribute($value)
    {
        return $this->customer->currency;
    }

    /**
     * Set currency_code attribute from customer
     *
     * @return string
     */
    public function getCurrencyCodeAttribute($value)
    {
        return $this->customer->currency->code;
    }
    
    /**
     * Set formatted_created_at attribute by custom date format
     * from Company Settings
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('date_format', $this->company_id);
        return Carbon::parse($this->created_at)->format($dateFormat);
    }

    /**
     * Set formatted_expiry_date attribute by custom date format
     * from Company Settings
     *
     * @return string
     */
    public function getFormattedExpiryDateAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('date_format', $this->company_id);
        return Carbon::parse($this->expiry_date)->format($dateFormat);
    }

    /**
     * Set formatted_estimate_date attribute by custom date format
     * from Company Settings
     *
     * @return string
     */
    public function getFormattedEstimateDateAttribute($value)
    {
        $dateFormat = CompanySetting::getSetting('date_format', $this->company_id);
        return Carbon::parse($this->estimate_date)->format($dateFormat);
    }

    /**
     * Scope a query to only include Estimates of a given company.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param int $company_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByCompany($query, $company_id)
    {
        $query->where('company_id', $company_id);
    }

    /**
     * Scope a query to only return draft Estimates
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrafts($query)
    {
        $query->where('status', self::STATUS_DRAFT);
    }
    
    /**
     * Scope a query to only return active Estimates
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        $active_stats = [
            self::STATUS_SENT,
            self::STATUS_VIEWED,
        ];
        $query->whereIn('status', $active_stats);
    }

    /**
     * Scope a query to only return non draft Estimates
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNonDraft($query)
    {
        $query->where('status', '!=', self::STATUS_DRAFT);
    }

    /**
     * Scope a query to only return Estimates which has estimate_date
     * greater or equal then given date
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param Date $from
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFrom($query, $from)
    {
        $query->where('estimate_date', '>=', $from);
    }

    /**
     * Scope a query to only return Estimates which has estimate_date
     * less or equal then given date
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param Date $to
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTo($query, $to)
    {
        $query->where('estimate_date', '<=', $to);
    }
}
