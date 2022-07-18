const list = Vue.createApp({

    data() {
        return {

            data: initialData(),
            search: null

        }
    },

    methods: {

        edit(url, event) {
            window.location.href = url.replace(':id', event.currentTarget.id);
        },

        find(str) {
            
            if (str == '') {
                
                this.data = initialData();
                return;

            }

            $.ajaxSetup({
                
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });

            $.ajax({

                url: '/' + modelViewed() + '/search/' + str,
                method: 'GET',
                dataType: 'json',
                success: data => {
                  this.data = data
                }

            })
        }

    }
});

function initialData()
{
    return modelViewed() == 'cars' ? cars : parts;
}

function modelViewed()
{
    return typeof cars == 'undefined' ? 'parts' : 'cars';
}