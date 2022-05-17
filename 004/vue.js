let id = 1;


Vue.createApp({


    data() {
        return {
            errors: [],
            showForm: false,
            newPib: '',
            newPhone: '',
            newViddil: '',
            hideCompleted: false,
            empl: []
        }
    },
    computed: {

    },

    methods: {
        addEmpl() {
            this.errors = [];
             if (!this.validPhone(this.newPhone))
             {
                 this.errors.push('Вкажіть коректний телефон.');
             } else{
                 this.empl.push({id: id++, pib: this.newPib, phone: this.newPhone, viddil: this.newViddil})
                 this.showForm = false
             }
        },

        showOn() {
            if(this.showForm == false) {
                this.showForm = true
            } else {
                this.showForm = false
            }
        },
        removeEmpl(empl) {
            this.empl = this.empl.filter((t) => t !== empl)
        },

        validPhone: function (value) {
            var re = /^[0-9].{5,10}$/;
            return re.test(value);
        }


    }
}).mount('#app')