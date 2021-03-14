<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                          
                    <form method="POST" action="" name="form1" >
                        <input type="hidden" name="_token" value="UNlQZmsa04GBPfXttgx8mJ5Ory23DKkKlBivDCaK">
            
                        <!-- to -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="to">
                                to
                            </label>
            
                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="to" type="text" name="to" required="required" autocomplete="to" value="+51918490148">
                        </div>
            
                        <!-- text -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="text">
                                text 
                            </label>
            
                            <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="text" type="text" name="text" required="required" autocomplete="text" value="Test text. Date: {{ date("l jS \of F Y h:i:s A") }}">
                        </div>
            
                        <!-- Remember Me -->
                        {{-- <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div> --}}
            
                        <div class="flex items-center justify-end mt-4">
                            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="http://nexmo-sms.prueba/forgot-text">
                                Forgot your text?
                            </a> --}}
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" >
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    document.form1.addEventListener( "submit", async (e) => {

        e.preventDefault();

        const form = document.getElementsByName('form1')[0]
        console.log('form',form)

        let params = {}
        const elements = form.elements
        for (let element in elements) {
            const key = elements[element].name
            if(!params[key]){
                const value = elements[element].value
                if(value){
                    params[key] = value
                }
            }
        }
        console.log('params',params)

        axios.post('send', {params}
        ).then(res => {
            console.log('res',res.data)
        }).catch(err => {
            console.log('err',err)
        })


    } );

    
</script>