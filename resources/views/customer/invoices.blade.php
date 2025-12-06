<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('messages.my_invoices') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ __('messages.invoice_history') }}</h3>
                    
                    <div class="space-y-4">
                        @forelse($invoices as $invoice)
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <h4 class="text-lg font-semibold text-gray-900">{{ __('messages.invoice_no') }}{{ $invoice->id }}</h4>
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $invoice->paid ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $invoice->paid ? __('messages.paid') : __('messages.unpaid') }}
                                        </span>
                                    </div>
                                    
                                    @if($invoice->booking)
                                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-3">
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.pet') }}</p>
                                            <p>{{ $invoice->booking->pet->name ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.room') }}</p>
                                            <p>{{ $invoice->booking->room->code ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.dates') }}</p>
                                            <p>{{ $invoice->booking->start_date }} to {{ $invoice->booking->end_date }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-700">{{ __('messages.amount') }}</p>
                                            <p class="text-pink-600 font-semibold text-lg">Rp {{ number_format($invoice->amount, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    <p class="text-xs text-gray-400">{{ __('messages.created') }}: {{ $invoice->created_at->format('d M Y, H:i') }}</p>
                                    @if($invoice->paid && $invoice->updated_at)
                                        <p class="text-xs text-gray-400">{{ __('messages.paid') }}: {{ $invoice->updated_at->format('d M Y, H:i') }}</p>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <a href="{{ route('customer.invoices.show', $invoice) }}" class="inline-flex items-center px-3 py-2 bg-pink-100 text-pink-700 rounded-md text-sm font-medium hover:bg-pink-200 transition">
                                        {{ __('messages.view_details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="mt-4 text-gray-500">{{ __('messages.no_invoices_yet') }}</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $invoices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
