@if (Session::has('toast'))
    <style type="text/css">
        #toast_container {
            width: 100%;
            position: fixed;
            bottom: 12%;
            left: 0;
            pointer-events: none;
        }

        #toast {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(48, 52, 55);
            color: rgb(245, 245, 245);
            font-size: 13px;
            padding: 5px;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            opacity: 0.95;
            -webkit-box-shadow: 1px 2px 2px 1px rgba(34, 34, 34, 1);
            box-shadow: 1px 2px 2px 1px rgba(34, 34, 34, 1);
            text-align: center;
            font-family: Roboto, sans-serif;
        }

        #toast em {
            color: rgb(81, 180, 210);
            font-weight: bold;
            font-style: normal;
        }

        .toast_top {
            top: 12%;
            bottom: auto !important;
        }

    </style>
    <script type="application/javascript">
        "use strict";

        class simpleToast {
            timer = null
            position = 'bottom'
            duration = 5000;
            content = '';
            style = '';

            constructor(options) {
                if (!options || typeof options != 'object') return false;

                if (options.duration) this.duration = parseFloat(options.duration);
                if (options.content) this.content = options.content;
                if (options.style) this.style = options.style;

                const pos = options.position
                if (pos && (pos === 'top' || pos === 'bottom')) this.position = pos;

                this.toast();
            }

            toast() {
                if (!this.content) return false;
                clearTimeout(this.timer);

                const body = document.getElementsByTagName('body')[0];

                let previous_toast = document.getElementById('toast_container');
                if (previous_toast) {
                    body.removeChild(previous_toast);
                }

                let classes = '';
                if (this.position === 'top') classes = 'toast_top';

                if (this.style) classes += ` ${this.style}`

                let toast_container = document.createElement('div');
                toast_container.setAttribute('id', 'toast_container');
                toast_container.setAttribute('class', classes);
                body.appendChild(toast_container);

                let toast = document.createElement('div');
                toast.setAttribute('id', 'toast');
                toast.innerHTML = this.content;
                toast_container.appendChild(toast);

                this.timer = setTimeout(this.hide, this.duration);
                return true;
            };

            hide() {
                const toast_container = document.getElementById('toast_container');
                if (!toast_container) return false;

                clearTimeout(this.timer);
                toast_container.parentNode.removeChild(toast_container);
                return true;
            };
        }

        (function () {
            new simpleToast({!! Session::get('toast') !!});
        })()
    </script>

@endif
