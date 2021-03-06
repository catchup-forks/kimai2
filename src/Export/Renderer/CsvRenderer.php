<?php

/*
 * This file is part of the Kimai time-tracking app.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Export\Renderer;

use App\Export\RendererInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class CsvRenderer extends AbstractSpreadsheetRenderer implements RendererInterface
{
    /**
     * @return string
     */
    public function getFileExtension(): string
    {
        return '.csv';
    }

    /**
     * @return string
     */
    protected function getContentType(): string
    {
        return 'text/csv';
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @return bool|string
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    protected function saveSpreadsheet(Spreadsheet $spreadsheet): string
    {
        $filename = tempnam(sys_get_temp_dir(), 'kimai-export-csv');
        $writer = IOFactory::createWriter($spreadsheet, 'Csv');
        $writer->save($filename);

        return $filename;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return 'csv';
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return 'csv';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'csv';
    }
}
