<?php

namespace App\Exceptions;

use Exception;

class TemplateProcessing extends Exception
{
    public static function TemplateProcessingLetter($type) {

        switch ($type) {
            case 'surat_permohonan' : $result = storage_path('template/SuratPermohonanTemplate.docx'); break;
            case 'surat_1' : $result = storage_path('template/SuratPermohonanTemplate.docx'); break;
            case 'surat_2' : $result = storage_path('template/SuratPermohonanTemplate.docx'); break;
            case 'surat_3' : $result = storage_path('template/SuratPermohonanTemplate.docx'); break;

            default  : $result = $type; 
        }
        return $result;
    }
}
