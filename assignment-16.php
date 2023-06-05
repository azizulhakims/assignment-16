Task 1:
 
Create a new Laravel project named "MigrationAssignment" using the Laravel command-line interface.
Ans: 
composer create-project --prefer-dist laravel/laravel MigrationAssignment

than 
cd MigrationAssignment

than
php artisan serve

Task 2: 
Within the project, create a new migration file named "create_products_table" that will be responsible for creating a table called "products" in the database. The "products" table should have the following columns:
 
id: an auto-incrementing integer and primary key.
name: a string column to store the product name.
price: a decimal column to store the product price.
description: a text column to store the product description.
created_at: a timestamp column to store the creation date and time.
updated_at: a timestamp column to store the last update date and time.

Ans: 
php artisan make:migration create_products_table --create=products

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

Task 3

For migrate comment: 
-php artisan migrate

Task 4

Modify the existing migration file "create_products_table" to add a new column called "quantity" to the "products" table. The "quantity" column should be an integer column and allow null values.

Ans: 
public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->integer('quantity')->nullable();
    });
}
Than :
php artisan migrate


Task 5

Create a new migration file named "add_category_to_products_table" that will be responsible for adding a new column called "category" to the "products" table. The "category" column should be a string column with a maximum length of 50 characters.


	php artisan make:migration add_category_to_products_table --table=products



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category', 50)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}





Task-6
After creating the new migration file, run the migration to add the "category" column to the "products" table.

php artisan migrate

Task-7

Create a new migration file named "create_orders_table" that will be responsible for creating a table called "orders" in the database. The "orders" table should have the following columns:

Ans
php artisan make:migration create_orders_table


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}








Task 8:
After creating the migration file for the "orders" table, run the migration to create the "orders" table in the database.

php artisan migrate


