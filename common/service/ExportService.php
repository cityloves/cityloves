<?php

namespace common\service;

use PHPExcel;
use IOFactory;
 

class ExportService
{
    /**
     * 根据要到处的数据生成PHPExcel对象
     *
     * @param $exportData  需要导出的数据，如果数据项是字符串类型，导出后单元格为文本格式
     * @param $dataTitle array 导出数据的标题
     *
     * @return \PHPExcel
     *
     * @throws \yii\web\NotFoundHttpException
     */
    public static function initPhpExcelObject($exportData, array $dataTitle = [])
    {
        if (empty($exportData)) {
            throw new \yii\web\NotFoundHttpException('The data is null');
        }

        $objPHPExcel = new \PHPExcel();
        $currentColumn = 1;
        $currentCell = 'A';

        if (!empty($dataTitle)) {
            foreach ($dataTitle as $val) {
                if (\is_string($val)) {
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($currentCell.$currentColumn, $val);
                } else {
                    $objPHPExcel->getActiveSheet()->setCellValue($currentCell.$currentColumn, $val);
                }
                ++$currentCell;
            }
            $dataTitle = [];
            ++$currentColumn;
        }

        foreach ($exportData as $row) {
            if (\is_array($row)) {
                $currentCell = 'A';
                foreach ($row as $value) {
                    if (\is_string($value)) {
                        $objPHPExcel->getActiveSheet()->setCellValueExplicit($currentCell.$currentColumn, $value);
                    } else {
                        $objPHPExcel->getActiveSheet()->setCellValue($currentCell.$currentColumn, $value);
                    }
                    ++$currentCell;
                }
            }
            ++$currentColumn;
        }
        foreach (\range('A', $currentCell) as $columnId) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnId)->setAutoSize(true);
        }

        return $objPHPExcel;
    }
}
