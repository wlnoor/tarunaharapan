<?php
use yii\helpers\Html;
use common\models\Siswa;

$this->params['breadcrumbs'][] = ['label' => 'Alumni', 'url' => ['siswa/alumni']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php foreach (Siswa::find()->where(['status' => 2])->groupBy('id_jurusan_angkatan')->all() as $JurusanAngkatan) { ?>
    <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $JurusanAngkatan->jurusanAngkatan->jurusan->nama.' - '.$JurusanAngkatan->jurusanAngkatan->angkatan->tahun ?></h3>
            <div class="box-tools pull-left">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nisn</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Jurusan Angkatan</th>
                        <th></th>
                    </tr>
                </thead>

                <?php $i = 1; foreach (Siswa::find()->where(['status' => 2,'id_jurusan_angkatan' => $JurusanAngkatan])->all() as $data) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->nisn ?></td>
                        <td><?= $data->jenisKelamin->nama ?></td>
                        <td><?= $data->getStatus() ?></td>
                        <td><?= $data->jurusanAngkatan->jurusan->nama . ' - ' . $data->jurusanAngkatan->angkatan->tahun; ?></td>
                        <th><?= Html::a('<i class="fa fa-eye"></i>', ['view','id' => $data->id]); ?></th>
                    </tr>
                <?php $i++; } ?>

            </table>
        </div>
    </div>
<?php } ?>