<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categoryables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('categoryable_id');
            $table->string('categoryable_type');
            $table->timestamps();
        });
    }
// foreignId('category_id'):
// Ini mendefinisikan kolom category_id sebagai foreign key yang merujuk ke tabel categories. Kolom ini digunakan untuk menyimpan ID kategori yang terkait dengan model tertentu.
// constrained():
// Metode ini secara otomatis menetapkan foreign key constraint, yang berarti bahwa nilai dalam kolom category_id harus ada di tabel categories. Jika tidak, database tidak akan mengizinkan penambahan data ke tabel ini.
// onDelete('cascade'):
// Ini menentukan bahwa jika suatu kategori dihapus dari tabel categories, maka semua entri terkait di tabel pivot ini juga akan dihapus secara otomatis. Ini berguna untuk menjaga integritas data, sehingga Anda tidak memiliki referensi yang hilang.
// unsignedBigInteger('categoryable_id'):
// Ini mendefinisikan kolom categoryable_id yang menyimpan ID dari model yang dapat memiliki kategori, seperti Product atau Post. Kolom ini menyimpan ID dari model tersebut.
// Tipe unsignedBigInteger digunakan untuk menyimpan ID yang lebih besar, yang biasanya merupakan tipe ID default dalam tabel Eloquent di Laravel.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoryables');
    }
};
