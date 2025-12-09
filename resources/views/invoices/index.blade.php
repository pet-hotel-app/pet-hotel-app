<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.invoices') }}</h2></x-slot>
    <div class="mb-6">
        <h3 class="text-2xl font-bold text-gray-900">{{ __('messages.invoices') }}</h3>
        <p class="text-gray-600 mt-2">{{ __('messages.all_invoices_description') }}</p>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ __('messages.all_invoices') }}</h3>
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"><span>{{ session('success') }}</span></div>
            @endif
            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                    <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.invoice_no') }}</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.booking_id') }}</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.owner') }}</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.total_amount') }}</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.payment_status') }}</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                            <tr class="hover:bg-gray-50">
                                <td class="border-dashed border-t border-gray-200 px-6 py-3"><span class="text-gray-700">INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</span></td>
                                <td class="border-dashed border-t border-gray-200 px-6 py-3"><span class="text-gray-700">#{{ $invoice->booking_id }}</span></td>
                                <td class="border-dashed border-t border-gray-200 px-6 py-3"><span class="text-gray-700">{{ $invoice->booking->pet->owner->name }}</span></td>
                                <td class="border-dashed border-t border-gray-200 px-6 py-3"><span class="text-gray-700">Rp {{ number_format($invoice->amount, 0, ',', '.') }}</span></td>
                                <td class="border-dashed border-t border-gray-200 px-6 py-3">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $invoice->paid ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $invoice->paid ? __('messages.paid') : __('messages.unpaid') }}
                                    </span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 px-6 py-3">
                                    <a href="{{ route('invoices.show', $invoice) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('messages.view') }}</a>
                                    @if(!$invoice->paid)
                                        <form action="{{ route('invoices.update', $invoice) }}" method="POST" class="inline-block">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="paid" value="1">
                                            <button type="submit" class="text-green-600 hover:text-green-900">{{ __('messages.mark_paid') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center py-10 px-4 text-sm text-gray-400">{{ __('messages.no_invoices_found') }}</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $invoices->links() }}</div>
        </div>
    </div>
</x-layout.admin>
