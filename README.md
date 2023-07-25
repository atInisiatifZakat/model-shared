# Model Shared

Paket ini berisikan model yang di share dan digunakan bersama di Inisiatif Zakat Indonesia, berisikan :

1. Model pekerjaan
2. Model tinggat pendidikan
3. Model negara, provinsi sampai dengan desa
4. Model status perkawinan

## Cara penggunaan

### Instalasi

Menggunakan composer dengan menjalankan perintah berikut:

```bash
composer require inisiatif/model-shared
```

### `Branch` and `Employee` relation `Donor`

Untuk penambahan relasi branch dan employee pada donor bisa menggunakan dymanic relation,
tambahkan kode berikut pada `boot` di service provider

```php
use Inisiatif\ModelShared\Models\Donor;

Donor::resolveRelationUsing('branch', function (Donor $model) {
    // Sesuaikan branch model
    return $model->belongsTo(Branch::class, 'branch_id');
});

Donor::resolveRelationUsing('employee', function (Donor $model) {
    // Sesuaikan employee model
    return $model->belongsTo(Employee::class, 'employeeid');
});
```
