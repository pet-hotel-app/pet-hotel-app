<x-layout.admin>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.invoice_detail') }} #INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8">
                    <!-- Invoice Header -->
                    <div class="flex justify-between items-start mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ strtoupper(__('messages.invoice')) }}</h1>
                            <p class="text-gray-600 mt-2">{{ __('messages.invoice_no') }}INV-{{ str_pad($invoice->id, 5, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-gray-600">{{ __('messages.date') }}: {{ $invoice->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-xl font-bold text-pink-600">Pet Hotel</h2>
                            <p class="text-gray-600">{{ __('messages.pet_care_services') }}</p>
                        </div>
                    </div>

                    <!-- Customer Info -->
                    <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold text-gray-700 mb-2">{{ __('messages.bill_to') }}</h3>
                        <p class="font-medium">{{ $invoice->booking->pet->owner->name }}</p>
                        <p class="text-gray-600">{{ $invoice->booking->pet->owner->email }}</p>
                        <p class="text-gray-600">{{ $invoice->booking->pet->owner->phone }}</p>
                    </div>

                    <!-- Booking Details -->
                    <div class="mb-8">
                        <h3 class="font-semibold text-gray-700 mb-4">{{ __('messages.booking_details') }}</h3>
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">{{ __('messages.description') }}</th>
                                    <th class="px-4 py-2 text-right text-sm font-medium text-gray-700">{{ __('messages.amount') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="px-4 py-3">
                                        <p class="font-medium">{{ __('messages.pet_boarding') }} - {{ $invoice->booking->pet->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $invoice->booking->start_date }} to {{ $invoice->booking->end_date }}</p>
                                        @if($invoice->booking->room)
                                            <p class="text-sm text-gray-600">{{ __('messages.room') }}: {{ $invoice->booking->room->code }} ({{ $invoice->booking->room->type ?? __('messages.standard') }})</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-right">Rp {{ number_format($invoice->amount, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Total -->
                    <div class="border-t-2 border-gray-300 pt-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-lg font-semibold">{{ __('messages.total_amount') }}:</span>
                            <span class="text-2xl font-bold text-pink-600">Rp {{ number_format($invoice->amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ __('messages.payment_status') }}:</span>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $invoice->paid ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $invoice->paid ? strtoupper(__('messages.paid')) : strtoupper(__('messages.unpaid')) }}
                            </span>
                        </div>
                        @if($invoice->paid && $invoice->paid_at)
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-sm text-gray-600">{{ __('messages.paid_on') }}</span>
                                <span class="text-sm">{{ $invoice->paid_at->format('d M Y H:i') }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 flex justify-between items-center">
                        <a href="{{ route('invoices.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 transition">
                            {{ __('messages.back_to_invoices') }}
                        </a>
                        @if(!$invoice->paid)
                            <form action="{{ route('invoices.update', $invoice) }}" method="POST">
                                @csrf @method('PUT')
                                <input type="hidden" name="paid" value="1">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#FFB6C9] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 transition">
                                    {{ __('messages.mark_as_paid') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
