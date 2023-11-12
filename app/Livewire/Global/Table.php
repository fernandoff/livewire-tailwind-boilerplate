<?php

namespace App\Livewire\Global;

use Livewire\Component;
use App\Helper\StringHelper;

class Table extends Component
{
    public $data;
    public $headers;
    public $indexes;

    private function getIndexes()
    {
        $allKeys = array_map('array_keys', $this->data);
        $flattenedKeys = array_merge(...$allKeys);
        return array_unique($flattenedKeys);
    }

    private function getTableHeadersForDisplay()
    {
        $headersForDisplay = [];
        foreach($this->getIndexes() as $distinct){
            $headersForDisplay[] = \App\Helper\StringHelper::mb_ucfirst($distinct);
        }

        return $headersForDisplay;
    }

    public function render()
    {
        if(empty($this->headers)){
            $this->headers = $this->getTableHeadersForDisplay();
        }

        return <<<'HTML'
            <div>
                <table>
                    <thead>
                        <tr>
                            @foreach($headers as $header)
                                <td> {{ $header }} </td>
                            @endforeach
                        </tr>
                    </thead>
                </table>

            </div>
        HTML;

    }
}
