@extends('client.layout')

@section('content')
    <!-- banner -->
    <section class="py-10 text-center flex flex-col gap-6 bg-[#335154]">
        <h2 class="text-[#df453e] font-[800] text-[42px]"></h2>
        <p class="text-[#777777] text-[16px] font-[500] ">Home <span class="text-white">/ History</span></p>
    </section>
    <section class="flex justify-center">
        <table class="table table-stripped mt-8">
            <thead>
                <tr class="bg-[f1f2f2]">
                    <th class="border uppercase px-3 py-1">full name</th>
                    <th class="border uppercase px-3 py-1">phone</th>
                    <th class="border uppercase px-3 py-1 w-[260px]">address</th>
                    <th class="border uppercase px-3 py-1">email</th>
                    <th class="border uppercase px-3 py-1">total price</th>
                    <th class="border uppercase px-3 py-1">status</th>
                    <th class="border uppercase px-3 py-1">voucher</th>
                    <th class="border uppercase px-3 py-1">acction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr class="bg-[f1f2f2]">
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ $bill->fullname }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ $bill->phone }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ $bill->address }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ $bill->email }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ number_format($bill->total_price) }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ $bill->status }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">{{ isset($bill->voucher_id) ? number_format($bill->voucher->discount) : 0 }}</td>
                        <td class="bg-[f1f2f2] px-3 py-1 border">
                            <a class="bg-blue-500 text-white rounded px-2 py-1 hover:text-black hover:bg-red-400"
                                href="">detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
