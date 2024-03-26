<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'full_name', 'email', 'phone_number', 'license_type', 'yearly_income', 'vehicle_id',
    ];

    protected $encryptable = [
        'full_name', 'email', 'phone_number', 'license_type', 'yearly_income',
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encryptString($value);
        }

        parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = Crypt::decryptString($value);
        }

        return $value;
    }
}
