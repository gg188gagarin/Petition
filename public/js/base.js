export class Base {
    constructor() {

        if (this.constructor === Base)
            throw new Error('Abstract class cannot be Instantiated');

        $(document).ready(() => {
            this.init();
            this.initBase();
        });
    }

    search(e, url) {
        e.preventDefault();
        let data = this.objectifyForm($(".js-searchForm").serializeArray());
        this.requestContent(url, data);
    }

    objectifyForm = function (formArray) {
        let returnArray = {};
        for (let i = 0; i < formArray.length; i++) {
            if (returnArray[formArray[i]['name']]) {
                returnArray[formArray[i]['name']] += "," + formArray[i]['value'];
            } else {
                returnArray[formArray[i]['name']] = formArray[i]['value'];
            }
        }
        return returnArray;
    };

}