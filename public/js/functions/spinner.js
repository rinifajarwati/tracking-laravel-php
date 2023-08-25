class CustomSpinner {
    constructor(
        target,
        opts = {
            corners: 0.1,
            speed: 1,
            animation: "spinner-line-shrink",
            color: "#ffffff",
        }
    ) {
        this.target = target;
        this.opts = opts;
        this.spinner = null;
    }

    createSpinner() {
        this.spinner = new Spin.Spinner(this.opts);
    }

    stopSpinner() {
        if (this.spinner) {
            this.spinner.stop();
            this.target.addClass("d-none");
        }
    }

    startSpinner() {
        if (this.spinner) {
            this.spinner.spin(this.target.get(0));
            this.target.removeClass("d-none");
        }
    }
}
