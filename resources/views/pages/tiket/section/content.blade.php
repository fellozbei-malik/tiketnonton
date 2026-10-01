<section class="relative bg-black min-h-screen">
    {{-- Hero Image Section --}}
    <div class="w-full h-[450px] relative overflow-hidden">
        <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }} Hero Image" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-black/70"></div>
    </div>

    <div class="container mx-auto px-4 pb-16 -mt-32 md:-mt-48 relative z-10">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-8 drop-shadow-2xl">{{ $event->name }}</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            @csrf
            <input type="hidden" name="cart_data" id="cart-data-input">
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            {{-- Kolom Kiri: Daftar Tiket --}}
            <div class="lg:col-span-2 space-y-4" id="ticket-list-container">
                @forelse($tickets as $ticket)
                <div class="bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 hover:border-white/40 hover:shadow-2xl hover:shadow-white/10 transition-all duration-300 overflow-hidden" data-ticket-id="{{ $ticket->id }}">
                    <div class="p-6 grid grid-cols-1 md:grid-cols-6 gap-4 items-center">
                        <div class="md:col-span-3">
                            <h3 class="text-xl font-bold text-white">{{ $ticket->name }}</h3>
                            <p class="text-xs text-gray-400 mt-2">{{ $event->start_time->format('F d, Y - h:i A') }}</p>
                        </div>
                        <div class="md:col-span-1 text-left md:text-center">
                            <p class="text-lg font-semibold text-white currency-price">{{ $ticket->price }}</p>
                        </div>
                        <div class="md:col-span-2 flex justify-start md:justify-end ticket-controls">
                            @if ($ticket->quantity === 0)
                            <span class="bg-red-600 text-white font-semibold py-2 px-5 rounded-lg shadow-xl">Sold Out</span>
                            @else
                            <button type="button" class="add-to-cart-button bg-white text-black font-semibold py-2 px-5 rounded-lg shadow-xl hover:bg-gray-200 transition-all hover:scale-105">Add</button>
                            <div class="quantity-selector hidden flex items-center gap-2">
                                <button type="button" class="decrease-quantity-button w-8 h-8 rounded-full bg-white/20 text-white hover:bg-white/30 transition-all">-</button>
                                <span class="selected-quantity-display font-bold w-8 text-center text-white">0</span>
                                <button type="button" class="increase-quantity-button w-8 h-8 rounded-full bg-white/20 text-white hover:bg-white/30 transition-all">+</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 p-6 text-center text-gray-400">No tickets available yet.</div>
                @endforelse
            </div>

            {{-- Kolom Kanan: Ringkasan Pesanan --}}
            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl border border-white/20 p-6">
                        <h2 class="text-xl font-bold text-white border-b border-white/20 pb-3 mb-4">Orders</h2>
                        <div id="selected-tickets-list" class="space-y-2">
                            <div class="min-h-[100px] flex items-center justify-center bg-white/5 rounded-lg p-4 empty-cart-message border border-white/10">
                                <p class="text-sm text-gray-400">Your selected tickets will show here.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-white/20 flex justify-between items-center">
                            <span class="text-gray-300 font-medium total-summary-text">Total (0 Ticket)</span>
                            <span class="font-bold text-2xl text-white total-price-display">Rp 0</span>
                        </div>
                        <button type="submit" id="select-ticket-button" class="cursor-pointer mt-4 w-full bg-white text-black font-bold py-3 rounded-lg shadow-xl hover:bg-gray-200 disabled:opacity-50 disabled:cursor-not-allowed transition-all hover:scale-105" disabled>
                            Select Ticket
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    const initialTicketsData = @json($initialTicketsData);
    let selectedTicketsState = {};
    document.addEventListener('DOMContentLoaded', () => {
        initialTicketsData.forEach(ticket => {
            selectedTicketsState[ticket.id] = {
                id: ticket.id
                , name: ticket.name
                , price: parseFloat(ticket.price)
                , available_quantity: ticket.available_quantity
                , selected_quantity: 0
            };
        });

        document.querySelectorAll('.currency-price').forEach(el => {
            el.textContent = formatCurrency(parseFloat(el.textContent));
        });

        setupEventListeners();
        updateOrderSummary();
    });


    function setupEventListeners() {
        const ticketListContainer = document.getElementById('ticket-list-container');
        ticketListContainer.addEventListener('click', (event) => {
            const target = event.target;
            const ticketCard = target.closest('[data-ticket-id]');
            if (!ticketCard) return;

            const ticketId = parseInt(ticketCard.dataset.ticketId);
            const ticketState = selectedTicketsState[ticketId];

            if (target.classList.contains('add-to-cart-button')) {
                if (ticketState.available_quantity > 0) {
                    ticketState.selected_quantity = 1;
                    toggleTicketControls(ticketCard, true);
                    updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                    updateOrderSummary();
                }
            } else if (target.classList.contains('increase-quantity-button')) {
                if (ticketState.selected_quantity < ticketState.available_quantity) {
                    ticketState.selected_quantity++;
                    updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                    updateOrderSummary();
                }
            } else if (target.classList.contains('decrease-quantity-button')) {
                ticketState.selected_quantity--;
                if (ticketState.selected_quantity <= 0) {
                    ticketState.selected_quantity = 0;
                    toggleTicketControls(ticketCard, false);
                }
                updateTicketQuantityDisplay(ticketCard, ticketState.selected_quantity);
                updateOrderSummary();
            }
        });
    }

    function toggleTicketControls(ticketCard, showSelector) {
        const addButton = ticketCard.querySelector('.add-to-cart-button');
        const quantitySelector = ticketCard.querySelector('.quantity-selector');

        if (showSelector) {
            addButton.classList.add('hidden');
            quantitySelector.classList.remove('hidden');
        } else {
            addButton.classList.remove('hidden');
            quantitySelector.classList.add('hidden');
        }
    }

    function updateTicketQuantityDisplay(ticketCard, quantity) {
        const quantityDisplay = ticketCard.querySelector('.selected-quantity-display');
        if (quantityDisplay) {
            quantityDisplay.textContent = quantity;
        }
    }

    function updateOrderSummary() {
        const selectedTicketsListEl = document.getElementById('selected-tickets-list');
        const totalSummaryTextEl = document.querySelector('.total-summary-text');
        const totalPriceDisplayEl = document.querySelector('.total-price-display');
        const selectTicketButton = document.getElementById('select-ticket-button');

        let totalQuantity = 0;
        let totalPrice = 0;
        let ticketsHtml = '';

        for (const id in selectedTicketsState) {
            const ticket = selectedTicketsState[id];
            if (ticket.selected_quantity > 0) {
                totalQuantity += ticket.selected_quantity;
                totalPrice += ticket.selected_quantity * ticket.price;
                ticketsHtml += `
                    <div class="flex justify-between items-center text-sm">
                        <div>
                            <p class="font-semibold text-white">${ticket.selected_quantity}x ${ticket.name}</p>
                            <p class="text-gray-400">${formatCurrency(ticket.price)}</p>
                        </div>
                        <p class="font-semibold text-white">${formatCurrency(ticket.price * ticket.selected_quantity)}</p>
                    </div>
                `;
            }
        }

        if (totalQuantity === 0) {
            selectedTicketsListEl.innerHTML = `
                <div class="min-h-[100px] flex items-center justify-center bg-white/5 rounded-lg p-4 empty-cart-message border border-white/10">
                    <p class="text-sm text-gray-400">Your selected tickets will show here.</p>
                </div>
            `;
            selectTicketButton.disabled = true;
        } else {
            selectedTicketsListEl.innerHTML = ticketsHtml;
            selectTicketButton.disabled = false;
        }

        totalSummaryTextEl.textContent = `Total (${totalQuantity} Ticket)`;
        totalPriceDisplayEl.textContent = formatCurrency(totalPrice);
    }
    // Event listener untuk form submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const cartData = Object.values(selectedTicketsState).filter(t => t.selected_quantity > 0);
        document.getElementById('cart-data-input').value = JSON.stringify(cartData);
    });

    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency'
            , currency: 'IDR'
            , minimumFractionDigits: 0
        }).format(amount);
    }

</script>
