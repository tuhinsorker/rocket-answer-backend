<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\PaymentTransaction;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;


class ImportPaymentTransaction implements ToCollection, WithStartRow, SkipsOnError,WithHeadingRow,WithChunkReading, ShouldQueue, WithValidation, SkipsEmptyRows
{
    // , WithStartRow, SkipsOnFailure, SkipsOnError
    use Importable, SkipsFailures, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function collection(Collection $rows){

        // $validate = Validator::make($rows->toArray(), [
        //     '*.expert_code' => 'required',
        //     '*.payment_amount' => 'required|numeric',
        //     '*.payment_date' => 'required|date',
        //     '*.email' => 'required',

        //  ],[
        //     'required' => ':attribute field is required.',
        //     'numeric' => ':attribute field must be numeric.',
        //     'date' => ':attribute field must be date.',
        // ])->validate() ;

        foreach ($rows as $row) {
            $this->dbTransactions($row);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
    public function chunkSize(): int
    {
        return 500;
    }

    public function rules(): array
    {
        return [
            'expert_code' => [
                'required',
                'string',
            ],
            'payment_amount' => [
                'required'
            ],
            'email' => [
                'required'
            ],
            'payment_date' => [
                'required'
            ],
        ];
    }

    private function dbTransactions($row){

        DB::transaction(function() use($row) {


            $expert = Expert::firstWhere('code',$row['expert_code']);

            if($expert){

                PaymentTransaction::create([
                    'expert_id' => $expert->id,
                    'amount' => $row['payment_amount'],
                    'payment_date' => $row['payment_date'],
                    'transaction_type' => 2,
                    'payment_method_id' => 1
                ]);
            }


         });

    }

}
