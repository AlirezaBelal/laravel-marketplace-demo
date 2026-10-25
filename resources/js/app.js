import './bootstrap';
import Chart from 'chart.js/auto';
import 'select2';

// Livewire 4 provides Alpine; importing Alpine 2 here would initialize it twice.
window.Chart = Chart;

// Livewire 4 dispatches named event payloads. Restore the shared feedback
// previously triggered through Livewire 2's removed emit() method.
let toastListenerInstalled = false;
function installMarketplaceToasts() {
    if (toastListenerInstalled || !window.Livewire) return;
    toastListenerInstalled = true;

    window.Livewire.on('toast', ({ type, message }) => {
        if (typeof message !== 'string' || !message.trim()) return;

        let region = document.getElementById('marketplace-toast-region');
        if (!region) {
            region = document.createElement('div');
            region.id = 'marketplace-toast-region';
            region.setAttribute('role', 'status');
            region.setAttribute('aria-live', 'polite');
            Object.assign(region.style, {
                position: 'fixed', top: '1rem', right: '1rem', zIndex: '10000',
                maxWidth: 'min(26rem, calc(100vw - 2rem))', direction: 'rtl',
            });
            document.body.appendChild(region);
        }

        const item = document.createElement('div');
        item.textContent = message;
        Object.assign(item.style, {
            backgroundColor: type === 'error' ? '#9f1239' : '#166534',
            color: '#fff', borderRadius: '0.5rem', padding: '0.75rem 1rem',
            marginBottom: '0.5rem', boxShadow: '0 4px 14px rgba(0, 0, 0, 0.2)',
        });
        region.appendChild(item);
        window.setTimeout(() => item.remove(), 4500);
    });
}

document.addEventListener('livewire:init', installMarketplaceToasts);
installMarketplaceToasts();
