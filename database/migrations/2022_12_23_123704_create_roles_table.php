<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            // mặc định tạo 2 cột created_at, updated_at
            $table->string('name',100)->unique();
            $table->string('description',200)->nullable();
            $table->timestamps();
            // xóa mềm 
            // kiểu timestamps:hỗ trợ thêm cả múi giờ
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
