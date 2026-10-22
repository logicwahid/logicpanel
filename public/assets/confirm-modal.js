/**
 * LogicPanel Custom Confirmation Modal
 * Replaces browser's native confirm() with a styled modal
 */

// Create modal HTML if not exists
function initConfirmModal() {
    if (document.getElementById('lp-confirm-modal')) return;
    
    const modalHTML = `
        <div id="lp-confirm-modal" class="lp-confirm-overlay">
            <div class="lp-confirm-box">
                <div class="lp-confirm-icon">
                    <i data-lucide="alert-circle"></i>
                </div>
                <h3 class="lp-confirm-title" id="lp-confirm-title">Confirm Action</h3>
                <p class="lp-confirm-message" id="lp-confirm-message">Are you sure?</p>
                <div class="lp-confirm-actions">
                    <button class="btn btn-secondary" id="lp-confirm-cancel">Cancel</button>
                    <button class="btn btn-danger" id="lp-confirm-ok">OK</button>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Add styles
    const style = document.createElement('style');
    style.textContent = `
        .lp-confirm-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.15s ease;
        }
        
        .lp-confirm-overlay.active {
            display: flex;
            opacity: 1;
        }
        
        .lp-confirm-box {
            background: var(--bg-card);
            border-radius: 8px;
            width: 90%;
            max-width: 420px;
            padding: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            transform: translateY(6px);
            transition: transform 0.15s ease;
            border: 1px solid var(--border-color);
            text-align: center;
        }
        
        .lp-confirm-overlay.active .lp-confirm-box {
            transform: translateY(0);
        }
        
        .lp-confirm-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            color: var(--danger);
        }
        
        .lp-confirm-icon svg {
            width: 32px;
            height: 32px;
        }
        
        .lp-confirm-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }
        
        .lp-confirm-message {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 24px;
            line-height: 1.5;
        }
        
        .lp-confirm-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        
        .lp-confirm-actions .btn {
            min-width: 100px;
        }
        
        [data-theme="dark"] .lp-confirm-box {
            background: var(--bg-card);
            border-color: var(--border-color);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }
    `;
    document.head.appendChild(style);
    
    // Initialize Lucide icons
    if (window.lucide) {
        lucide.createIcons();
    }
}

/**
 * Show confirmation modal
 * @param {string} message - Confirmation message
 * @param {string} title - Modal title (optional)
 * @returns {Promise<boolean>} - Resolves to true if confirmed, false if cancelled
 */
window.confirmAction = function(message, title = 'Confirm Action') {
    return new Promise((resolve) => {
        initConfirmModal();
        
        const modal = document.getElementById('lp-confirm-modal');
        const titleEl = document.getElementById('lp-confirm-title');
        const messageEl = document.getElementById('lp-confirm-message');
        const cancelBtn = document.getElementById('lp-confirm-cancel');
        const okBtn = document.getElementById('lp-confirm-ok');
        
        titleEl.textContent = title;
        messageEl.textContent = message;
        
        modal.classList.add('active');
        
        function close(result) {
            modal.classList.remove('active');
            resolve(result);
            cancelBtn.removeEventListener('click', handleCancel);
            okBtn.removeEventListener('click', handleOk);
            modal.removeEventListener('click', handleOverlay);
        }
        
        function handleCancel() {
            close(false);
        }
        
        function handleOk() {
            close(true);
        }
        
        function handleOverlay(e) {
            if (e.target === modal) {
                close(false);
            }
        }
        
        cancelBtn.addEventListener('click', handleCancel);
        okBtn.addEventListener('click', handleOk);
        modal.addEventListener('click', handleOverlay);
        
        // ESC key to cancel
        function handleEsc(e) {
            if (e.key === 'Escape') {
                close(false);
                document.removeEventListener('keydown', handleEsc);
            }
        }
        document.addEventListener('keydown', handleEsc);
    });
};

// Initialize on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initConfirmModal);
} else {
    initConfirmModal();
}
