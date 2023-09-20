<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Contact extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'];
}
$contact = Contact::create([
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'phone' => $request->input('phone'),
    'subject' => $request->input('subject'),
    'message' => $request->input('message'),
]);
