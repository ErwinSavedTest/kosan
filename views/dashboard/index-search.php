<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FactorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'kosan Saya';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
 <div class="box-header with-border">
   <div class="box-title">
  Anda Sedang Mengkost
   <?php
      $columns = [
         ['class' => 'kartik\grid\SerialColumn'],
            //'id',
            [
              'attribute' => 'kosan_id',
              'label'     => 'Nama Kosan',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'filter'    => false,
              'content'   => function($model){
                 return $model->kosan->nama_kosan;
              },
              'contentOptions' => ['style' => 'width:180px;'],
            ],

             [
              'attribute' => 'kosan_id',
              'label'     => 'Alamat Kosan',
              'hAlign'    => 'left',  
              'vAlign'    => 'middle',
              'filter'    => false,
              'content'   => function($model){
                 return $model->kosan->alamat_kosan;
              },
              'contentOptions' => ['style' => 'width:180px;'],
            ],

            [
             'attribute' => 'Action',
             'format'    =>'raw',
             'hAlign'    => 'center',  
             'vAlign'    => 'middle',
             'filter'  => false,
             'contentOptions' => ['style' => 'width:100px;'],
             'value' => function($model) {
                 return
                  Html::a(Html::tag('i', '', ['class' => 'fa fa-sign-out' ]). ' '.'Keluar Kosan', ['/dashboard/keluar-kost', 'id' => $model->kosan->id], ['class' => 'btn btn-info btn-xs', 'title' => 'Tombol Ini Untuk Mengakhiri Kosan Anda']);             

                },
         ],
            
      ];
     ?> 
  </div>
</div>
 <div class="box-body">
   <?= GridView::widget([
       'dataProvider' => $dataProvider,
       'filterModel' => $searchModel,
       'columns' => $columns,
       'toolbar' =>  [
              '{export}',
              //'{toggleData}',
          ],
          'toggleDataContainer' => ['class' => 'btn-group mr-2'],
          'export' => [
              'fontAwesome' => true
          ],
          //'showPageSummary' => true,
          'panel' => [
              'type' => GridView::TYPE_PRIMARY,
          ],
        'exportConfig' => [

             GridView::PDF   => [
                  'label'    => 'PDF', 
                  'filename' => 'exported-data_kosan_PDF' . date('Y-m-d_H-i-s'),
                  //'title'    => 'kosan PDF', 
                  'config'   => [
                    // 'methods' => [
                    //   'SetHeader' => [
                    //     ['odd' => $pdfHeader, 'even' => $pdfHeader]
                    //   ],
                    //   'SetFooter' => [
                    //     ['odd' => $pdfFooter, 'even' => $pdfFooter]
                    //   ],
                    // ],
                    /*'options' => [
                      'title' => '',
                      'subject' => 'Preceptors',
                      'keywords' => 'pdf, preceptors, export, other, keywords, here'
                    ],*/
                    'contentBefore' => 'Daftar kosan Kosan',
                    //'contentAfter'  => 'Telah diterima uang dari PT Aren Mandala Sari pada tanggal ___________________'
                    /*sebesar IDR '.$searchModel->total_price.'*/
                  ]
                ],

             GridView::EXCEL   => [
                    'label'    => 'EXCEL',
                    'filename' => 'exported-data_kosan_EXCEL' . date('Y-m-d_H-i-s'),
                    //'title'    => 'kosan EXCEL',                        
                    'options'  => ['title' => 'kosan List', 'author' => 'Me'], 
                    'config'   => [
                       'cssFile' => ['style' => 'background-color: red;'],
                    ]           
                ],

              GridView::HTML   => [
                    'label'    => 'HTML',
                    'filename' => 'exported-data_kosan_HTML' . date('Y-m-d_H-i-s'),                            
                ], 

                GridView::JSON   => [
                    'label'    => 'JSON',
                    'filename' => 'exported-data_kosan_JSON' . date('Y-m-d_H-i-s'),       
                ],  

                 GridView::CSV   => [
                    'label'    => 'CSV',
                    'filename' => 'exported-data_kosan_CSV' . date('Y-m-d_H-i-s'),            
                ],   

                GridView::TEXT   => [
                    'label'    => 'TEXT',
                    'filename' => 'exported-data_kosan_TEXT' . date('Y-m-d_H-i-s'),              
                ],

             ],
      ]); 
    ?> 
 </div>
</div>