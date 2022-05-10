<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{route('index')}}" class="text-decoration-none">
            <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Главная страница</button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="btn btn-secondary h-75 rounded-pill mx-0" onclick="getTokens()">
                        Обновить
                    </button>
                    <button class="btn btn-secondary h-75 rounded-pill mx-5 mb-3" onclick="makeIndividualToken()">
                        Дать токен
                    </button>
                    <p>Токены клиентов:</p>
                    <ul class="clientTokenList">
                    </ul>

                    <p>Индивидуальные токены:</p>
                    <ul class="individualTokenList">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getClientTokens() {
            let toklist = document.getElementsByClassName('clientTokenList')[0];
            toklist.innerHTML = "Обновляется...";
            axios.get('/oauth/tokens')
                .then(response => {
                    let json = response.data;
                    console.log(json);
                    toklist.innerHTML = "";
                    json.forEach(token => {
                        console.log(token);
                        let tokDOM = document.createElement("li");
                        tokDOM.innerHTML = token['id'];
                        toklist.append(tokDOM);
                    });
                });
        }
        function getIndividualTokens() {
            let toklist = document.getElementsByClassName('individualTokenList')[0];
            toklist.innerHTML = "Обновляется...";
            axios.get('/oauth/personal-access-tokens')
                .then(response => {
                    let json = response.data;
                    console.log(json);
                    toklist.innerHTML = "";
                    json.forEach(token => {
                        console.log(token);
                        let tokDOM = document.createElement("li");
                        tokDOM.innerHTML = token['id'];
                        toklist.append(tokDOM);
                    });
                });
        }
        function getTokens()
        {
            getClientTokens();
            getIndividualTokens();
        }
        function makeIndividualToken() {
            const data = {
                name: 'Token Name',
                scopes: []
            };
            axios.post('/oauth/personal-access-tokens', data)
                .then(response => {
                    console.log(response.data.accessToken);
                    alert('Токен создан');
                    getIndividualTokens();
                })
                .catch(response => {
                    console.log(response.data);
                    alert('Токен не удалось создать');
                });
        }
        window.onload = getTokens;
    </script>
</x-app-layout>
