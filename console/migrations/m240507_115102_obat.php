<?php

use yii\db\Migration;

/**
 * Class m240507_115102_obat
 */
class m240507_115102_obat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%obat}}', [
            'id' => $this->primaryKey(),
            'nama_obat' => $this->string()->notNull(),
            'id_kategori' => $this->integer()->notNull(),
            'harga_obat' => $this->integer()->notNull(),
            'stok_obat' => $this->integer()->notNull(),
        ]);

        // $this->batchInsert('obat', ['nama_obat', 'id_kategori', 'harga_obat', 'stok_obat'], [
        //     ['Paracetamol', 'kaplet', 10000, 80],
        //     ['Amoxicillin', 'kapsul', 15000, 50],
        //     ['Ibuprofen', 'tablet', 12000, 60],
        //     ['Omeprazole', 'kapsul', 20000, 40],
        //     ['Loratadine', 'tablet', 18000, 70],
        //     ['Cetirizine', 'tablet', 16000, 90],
        //     ['Dexamethasone', 'injeksi', 25000, 30],
        //     ['Ranitidine', 'tablet', 22000, 50],
        //     ['Metformin', 'tablet', 23000, 45],
        //     ['Diazepam', 'tablet', 30000, 35],
        //     ['Tramadol', 'tablet', 28000, 55],
        //     ['Atorvastatin', 'tablet', 35000, 40],
        //     ['Simvastatin', 'tablet', 32000, 60],
        //     ['Cefixime', 'kapsul', 28000, 70],
        //     ['Ceftriaxone', 'injeksi', 40000, 25],
        //     ['Azithromycin', 'tablet', 38000, 45],
        //     ['Clarithromycin', 'tablet', 36000, 65],
        //     ['Doxycycline', 'kapsul', 42000, 30],
        //     ['Levofloxacin', 'tablet', 44000, 50],
        //     ['Naproxen', 'tablet', 40000, 35],
        // ]);

        // creates index for column `id_kategori`
        $this->createIndex(
            '{{%idx-obat-id_kategori}}',
            '{{%obat}}',
            'id_kategori'
        );

        // add foreign key for table `pasien`
        $this->addForeignKey(
            '{{%fk-obat-id_kategori}}',
            '{{%obat}}',
            'id_kategori',
            '{{%kategori_obat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drop foreign key for table `pasien`
        $this->dropForeignKey(
            '{{%fk-obat-kategori_obat}}',
            '{{%obat}}'
        );

        // drop index for column `kategori_obat`
        $this->dropIndex(
            '{{%idx-obat-kategori_obat}}',
            '{{%obat}}'
        );

        $this->dropTable('{{%obat}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_115102_obat cannot be reverted.\n";

        return false;
    }
    */
}
