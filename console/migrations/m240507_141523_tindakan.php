<?php

use yii\db\Migration;

/**
 * Class m240507_141523_tindakan
 */
class m240507_141523_tindakan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tindakan}}', [
            'id' => $this->primaryKey(),
            'nama_tindakan' => $this->string()->notNull(),
            'keterangan' => $this->string()->notNull(),
            'tarif' => $this->integer()->notNull(),
        ]);

        $this->batchInsert('{{%tindakan}}', ['nama_tindakan', 'keterangan', 'tarif'], [
            ['Pemeriksaan Umum', 'Pemeriksaan biasa oleh dokter', 50000],
            ['Pemeriksaan Darah', 'Pemeriksaan darah rutin', 75000],
            ['Pemeriksaan Urin', 'Pemeriksaan urin rutin', 70000],
            ['Pemeriksaan Mata', 'Pemeriksaan mata oleh dokter spesialis', 100000],
            ['Pemeriksaan Gigi', 'Pemeriksaan gigi oleh dokter gigi', 80000],
            ['Pemeriksaan Jantung', 'Pemeriksaan jantung oleh dokter spesialis jantung', 120000],
            ['Pemeriksaan Kulit', 'Pemeriksaan kulit oleh dokter spesialis kulit', 90000],
            ['Pemeriksaan Telinga', 'Pemeriksaan telinga oleh dokter spesialis telinga', 85000],
            ['Pemeriksaan Paru-paru', 'Pemeriksaan paru-paru oleh dokter spesialis paru-paru', 110000],
            ['Pemeriksaan Ginjal', 'Pemeriksaan ginjal oleh dokter spesialis ginjal', 100000],
            ['Operasi', 'Operasi berat', 600000],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%obat}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_141523_tindakan cannot be reverted.\n";

        return false;
    }
    */
}
