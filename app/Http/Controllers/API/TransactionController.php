<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionAccesorieItem;
use App\Models\TransactionItem;
use App\Models\TransactionServiceItem;
use App\Models\TransactionSparepartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $customer_id = $request->input('customer_id');

        if ($id) {
            $transaction = Transaction::with(['sparepartItems.sparepart', 'accesorieItems.accesorie', 'serviceItems.service'])->find($id);

            if ($transaction)
                return ResponseFormatter::success(
                    $transaction,
                    'Data transaksi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
        }


        if ($customer_id) {
            $transaction = Transaction::with(['customer', 'sparepartItems.sparepart', 'accesorieItems.accesorie', 'serviceItems.service'])->where('customer_id', '=', $customer_id)->get();
            print($customer_id);
            return ResponseFormatter::success(
                $transaction,
                'Data list transaksi berhasil diambil'
            );
        }
        $transaction = Transaction::with(['customer', 'sparepartItems.sparepart', 'accesorieItems.accesorie', 'serviceItems.service'])->get();
        return ResponseFormatter::success(
            $transaction,
            'Data list transaksi berhasil diambil'
        );
    }
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return ResponseFormatter::success($transaction, 'Tramsaction deleted');
    }

    public function checkout(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_id' => ['required'],
                'sparepart_items' => ['array'],
                'sparepart_items.*.id' => ['exists:spareparts,id'],
                'accesorie_items' => ['array'],
                'accesorie_items.*.id' => ['exists:accesories,id'],
                'service_items' => ['array'],
                'service_items.*.id' => ['exists:services,id'],
                'total_price' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $transaction = Transaction::create([
            'customer_id' => $request->customer_id,
            'total_price' => $request->total_price,
        ]);
        if ($request->sparepart_items) {

            foreach ($request->sparepart_items as $sparepart) {
                TransactionSparepartItem::create([
                    'customer_id' => $request->customer_id,
                    'sparepart_id' => $sparepart['id'],
                    'transaction_id' => $transaction->id,
                    'qty_sparepart' => $sparepart['quantity']
                ]);
            }
        }
        if ($request->accesorie_items) {

            foreach ($request->accesorie_items as $accesorie) {
                TransactionAccesorieItem::create([
                    'customer_id' => $request->customer_id,
                    'accesorie_id' => $accesorie['id'],
                    'transaction_id' => $transaction->id,
                    'qty_accesorie' => $accesorie['quantity']
                ]);
            }
        }
        if ($request->service_items) {

            foreach ($request->service_items as $service) {
                TransactionServiceItem::create([
                    'customer_id' => $request->customer_id,
                    'service_id' => $service['id'],
                    'transaction_id' => $transaction->id,
                    'qty_service' => $service['quantity']
                ]);
            }
        }

        return ResponseFormatter::success($transaction->load(['sparepartItems.sparepart', 'accesorieItems.accesorie', 'serviceItems.service']), 'Transaksi berhasil');
    }
    public function update(Request $request, $id)
    {

        $transaction = Transaction::find($id);
        $transaction->update(['total_price' => $request->total_price,]);
        if ($request->sparepart_items) {

            foreach ($request->sparepart_items as $sparepart) {

                TransactionSparepartItem::create([
                    'customer_id' => $request->customer_id,
                    'sparepart_id' => $sparepart['id'],
                    'transaction_id' => $transaction->id,
                    'qty_sparepart' => $sparepart['quantity']
                ]);
            }
        }
        if ($request->accesorie_items) {

            foreach ($request->accesorie_items as $accesorie) {
                TransactionAccesorieItem::create([
                    'customer_id' => $request->customer_id,
                    'accesorie_id' => $accesorie['id'],
                    'transaction_id' => $transaction->id,
                    'qty_accesorie' => $accesorie['quantity']
                ]);
            }
        }
        if ($request->service_items) {

            foreach ($request->service_items as $service) {
                TransactionServiceItem::create([
                    'customer_id' => $request->customer_id,
                    'service_id' => $service['id'],
                    'transaction_id' => $transaction->id,
                    'qty_service' => $service['quantity']
                ]);
            }
        }

        return ResponseFormatter::success($transaction->load(['sparepartItems.sparepart', 'accesorieItems.accesorie', 'serviceItems.service']), 'Transaksi berhasil');
    }
}
