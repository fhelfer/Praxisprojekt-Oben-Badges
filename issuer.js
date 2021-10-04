const OpenBadges = {
    configUrl: 'https://static.badgr.io/issuerjs-config/production/env.json',
    // configUrl: "env.json",
    fetchOptions: {
        method: 'GET',
    },
    callbackFn: () => {},
    assertions: [],
    messageHandler: messageEvent => {
        if (messageEvent.data.closeModal) {
            OpenBadges.closeModal();
        }
    },

    issue: function(assertions, callbackFn) {
        OpenBadges.callbackFn = callbackFn;

        if (assertions && (typeof assertions === 'string' || assertions instanceof String)){
            OpenBadges.assertions = [assertions];
        }
        else {
            OpenBadges.assertions = assertions;
        }

        window.addEventListener('message', OpenBadges.messageHandler);

        OpenBadges.openModal();
    },
    issue_no_modal: function(assertions, callbackFn){
        OpenBadges.issue(assertions, callbackFn);
    },

    closeModal() {
        window.removeEventListener('message', OpenBadges.messageHandler);
        document.body.removeChild(document.querySelector('#issuerJsModal'));
        setTimeout(() => OpenBadges.callbackFn(), 0);
    },

    openModal() {
        fetch(OpenBadges.configUrl, OpenBadges.fetchOptions)
            .then(response => response.json())
            .then(config => {
                const angularApp = config.angularApp;
                if (angularApp) {
                    const contentEl = OpenBadges.createContentEl(angularApp);

                    const modalEl = OpenBadges.createModalEl();

                    modalEl.appendChild(contentEl);
                    document.body.appendChild(modalEl);
                }
            });
    },

    createContentEl(path) {
        const el = document.createElement('iframe');
        el.setAttribute('style', 'border: none; position: absolute; left: 0; width: 100%; height: 100%; top: 0;');
        el.src = path;
        el.addEventListener('load', (event) => {
            event.currentTarget.contentWindow.postMessage({ assertions: OpenBadges.assertions }, '*');
        });
        return el;
    },

    createModalEl() {
        const el = document.createElement('div');
        el.setAttribute('id', 'issuerJsModal');
        el.setAttribute('style', 'position: fixed; top: 0px; left: 0px; right: 0px; bottom: 0px; z-index: 99999');
        return el;
    },
};

window.OpenBadges = OpenBadges;