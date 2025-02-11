    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('ref_jabatan', function (Blueprint $table) {
                $table->tinyIncrements('id');
                $table->string('uraian', 100);
                $table->enum('ttd_default', ['Y', 'N']);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('ref_jabatan');
        }
    };
