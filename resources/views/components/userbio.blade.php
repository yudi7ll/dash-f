<link rel="stylesheet" href="{{ asset('css/userinfo.css') }}">

<div class="row">
    <div class="col-6 offset-3 col-sm-3 offset-sm-0">
        <a
            class="userinfo-cover"
            href="{{ route('cover', $userinfo->user->cover) }}"
            style="background-image: url('{{ route('cover', $userinfo->user->cover) }}')"
            target="_blank"
        ></a>
    </div>
    <div class="col-sm-9">
        <div class="d-flex align-items-center justify-content-center justify-content-sm-start my-2 my-sm-0">
            <h1 class="font-weight-bold mb-0">{{ $userinfo->user->name }}</h1>
            <button class="btn btn-outline-primary btn-sm ml-2" type="button">Follow</button>
        </div>
        <div class="userinfo-connection mb-3 text-center text-sm-left">
            <a class="mr-2 text-secondary" href="#"><strong>156k</strong> Followers</a>
            <a class="text-secondary" href="#"><strong>256</strong> Following</a>
        </div>
        <div class="userinfo-bio">
            <p>{{ $userinfo->bio }}</p>
        </div>
        <div class="userinfo-work_as">
            <div class="text-muted">Work as : </div>
            <h6>
                <strong>{{ $userinfo->work_as }}</strong>
                <span> at </span>
                <strong>{{ $userinfo->work_at }}</strong>
            </h6>
        </div>
        <div class="userinfo-birth">
            <div class="text-muted">Born : </div>
            <h6 class="font-weight-bold">{{ \Carbon\Carbon::parse($userinfo->birth_date)->format('d  M  Y') }}</h6>
        </div>
        <div class="userinfo-sosmed mt-3">
            @isset($userinfo->website)
                <a class="d-inline-block mr-2 text-dark" href="{{ $userinfo->website }}" target="_blank">
                    <svg width="30px" height="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"> <g> <g>
                        <path fill="#212121" d="M163.83,151H241V32.501C208.786,43.079,179.815,88.297,163.83,151z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M163.83,361c15.985,62.703,44.956,107.921,77.17,118.499V361H163.83z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M497,181H15c-8.284,0-15,6.714-15,15v120c0,8.284,6.716,15,15,15h482c8.284,0,15-6.716,15-15V196 C512,187.714,505.284,181,497,181z M479.418,232.709l-30,60C446.869,297.792,441.684,301,436,301 c-5.684,0-10.869-3.208-13.418-8.291L406,259.545l-16.582,33.164c-5.098,10.166-21.738,10.166-26.836,0l-28.74-57.495 c-1.729-2.122-2.714-4.788-3.034-7.634c-0.185,1.734-0.564,3.477-1.39,5.129l-30,60C296.869,297.792,291.684,301,286,301 c-5.684,0-10.869-3.208-13.418-8.291L256,259.545l-16.582,33.164c-5.098,10.166-21.738,10.166-26.836,0l-30-60 c-0.795-1.589-1.137-3.267-1.337-4.935c-0.377,3.232-1.597,6.178-3.571,8.421l-28.257,56.514C146.869,297.792,141.684,301,136,301 s-10.869-3.208-13.418-8.291L106,259.545l-16.582,33.164C86.869,297.792,81.684,301,76,301s-10.869-3.208-13.418-8.291l-30-60 c-3.706-7.412-0.703-16.421,6.709-20.127c7.397-3.662,16.392-0.718,20.127,6.709L76,252.455l16.582-33.164 c5.307-10.649,21.288-11.097,26.836,0L136,252.455l16.582-33.164c2.695-5.391,8.364-8.32,14.385-8.262 c7.753,0.509,13.916,6.903,14.242,14.509c0.179-5.321,2.985-10.408,8.082-12.957c7.427-3.662,16.406-0.718,20.127,6.709 L226,252.455l16.582-33.164c5.098-10.166,21.738-10.166,26.836,0L286,252.455l16.582-33.164 c3.706-7.427,12.715-10.371,20.127-6.709c5.054,2.527,7.839,7.549,8.064,12.819c0.291-7.535,5.649-13.808,13.351-14.313 c6.182-0.146,12.598,2.813,15.294,8.203L376,252.455l16.582-33.164c5.098-10.166,21.738-10.166,26.836,0L436,252.455 l16.582-33.164c3.721-7.427,12.7-10.371,20.127-6.709C480.121,216.288,483.124,225.297,479.418,232.709z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M271,361v118.499c32.214-10.578,61.185-55.796,77.17-118.499H271z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M271,32.501V151h77.17C332.185,88.297,303.214,43.079,271,32.501z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M133.019,361H24.544C65.545,451.022,156.334,512,256,512C201.814,512,154.477,452.326,133.019,361z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M378.981,361C357.523,452.326,310.186,512,256,512c99.666,0,190.455-60.978,231.456-151H378.981z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M24.544,151h108.475C154.477,59.674,201.814,0,256,0C156.334,0,65.545,60.978,24.544,151z"/> </g> </g> <g> <g>
                        <path fill="#212121" d="M256,0c54.186,0,101.523,59.674,122.981,151h108.475C446.455,60.978,355.666,0,256,0z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g>
                    </svg>
                </a>
            @endisset
            @isset($userinfo->github)
                <a class="d-inline-block mr-2" href="{{ $userinfo->github }}" target="_blank">
                    <svg enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="30px" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#212121" d="m12 .5c-6.63 0-12 5.28-12 11.792 0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56 4.801-1.548 8.236-5.97 8.236-11.173 0-6.512-5.373-11.792-12-11.792z"/>
                    </svg>
                </a>
            @endisset
            @isset($userinfo->twitter)
                <a class="d-inline-block mr-2" href="{{ $userinfo->twitter }}" target="_blank">
                    <svg height="30px" viewBox="0 0 512 512" width="30px" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#212121" d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm116.886719 199.601562c.113281 2.519532.167969 5.050782.167969 7.59375 0 77.644532-59.101563 167.179688-167.183594 167.183594h.003906-.003906c-33.183594 0-64.0625-9.726562-90.066406-26.394531 4.597656.542969 9.277343.8125 14.015624.8125 27.53125 0 52.867188-9.390625 72.980469-25.152344-25.722656-.476562-47.410156-17.464843-54.894531-40.8125 3.582031.6875 7.265625 1.0625 11.042969 1.0625 5.363281 0 10.558593-.722656 15.496093-2.070312-26.886718-5.382813-47.140624-29.144531-47.140624-57.597657 0-.265624 0-.503906.007812-.75 7.917969 4.402344 16.972656 7.050782 26.613281 7.347657-15.777343-10.527344-26.148437-28.523438-26.148437-48.910157 0-10.765624 2.910156-20.851562 7.957031-29.535156 28.976563 35.554688 72.28125 58.9375 121.117187 61.394532-1.007812-4.304688-1.527343-8.789063-1.527343-13.398438 0-32.4375 26.316406-58.753906 58.765625-58.753906 16.902344 0 32.167968 7.144531 42.890625 18.566406 13.386719-2.640625 25.957031-7.53125 37.3125-14.261719-4.394531 13.714844-13.707031 25.222657-25.839844 32.5 11.886719-1.421875 23.214844-4.574219 33.742187-9.253906-7.863281 11.785156-17.835937 22.136719-29.308593 30.429687zm0 0"/>
                    </svg>
                </a>
            @endisset
            @isset($userinfo->instagram)
                <a class="d-inline-block mr-2" href="{{ $userinfo->instagram }}" target="_blank">
                    <svg height="30px" viewBox="0 0 512 512" width="30px" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#212121" d="m305 256c0 27.0625-21.9375 49-49 49s-49-21.9375-49-49 21.9375-49 49-49 49 21.9375 49 49zm0 0"/>
                        <path fill="#212121" d="m370.59375 169.304688c-2.355469-6.382813-6.113281-12.160157-10.996094-16.902344-4.742187-4.882813-10.515625-8.640625-16.902344-10.996094-5.179687-2.011719-12.960937-4.40625-27.292968-5.058594-15.503906-.707031-20.152344-.859375-59.402344-.859375-39.253906 0-43.902344.148438-59.402344.855469-14.332031.65625-22.117187 3.050781-27.292968 5.0625-6.386719 2.355469-12.164063 6.113281-16.902344 10.996094-4.882813 4.742187-8.640625 10.515625-11 16.902344-2.011719 5.179687-4.40625 12.964843-5.058594 27.296874-.707031 15.5-.859375 20.148438-.859375 59.402344 0 39.25.152344 43.898438.859375 59.402344.652344 14.332031 3.046875 22.113281 5.058594 27.292969 2.359375 6.386719 6.113281 12.160156 10.996094 16.902343 4.742187 4.882813 10.515624 8.640626 16.902343 10.996094 5.179688 2.015625 12.964844 4.410156 27.296875 5.0625 15.5.707032 20.144532.855469 59.398438.855469 39.257812 0 43.90625-.148437 59.402344-.855469 14.332031-.652344 22.117187-3.046875 27.296874-5.0625 12.820313-4.945312 22.953126-15.078125 27.898438-27.898437 2.011719-5.179688 4.40625-12.960938 5.0625-27.292969.707031-15.503906.855469-20.152344.855469-59.402344 0-39.253906-.148438-43.902344-.855469-59.402344-.652344-14.332031-3.046875-22.117187-5.0625-27.296874zm-114.59375 162.179687c-41.691406 0-75.488281-33.792969-75.488281-75.484375s33.796875-75.484375 75.488281-75.484375c41.6875 0 75.484375 33.792969 75.484375 75.484375s-33.796875 75.484375-75.484375 75.484375zm78.46875-136.3125c-9.742188 0-17.640625-7.898437-17.640625-17.640625s7.898437-17.640625 17.640625-17.640625 17.640625 7.898437 17.640625 17.640625c-.003906 9.742188-7.898437 17.640625-17.640625 17.640625zm0 0"/>
                        <path fill="#212121" d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm146.113281 316.605469c-.710937 15.648437-3.199219 26.332031-6.832031 35.683593-7.636719 19.746094-23.246094 35.355469-42.992188 42.992188-9.347656 3.632812-20.035156 6.117188-35.679687 6.832031-15.675781.714844-20.683594.886719-60.605469.886719-39.925781 0-44.929687-.171875-60.609375-.886719-15.644531-.714843-26.332031-3.199219-35.679687-6.832031-9.8125-3.691406-18.695313-9.476562-26.039063-16.957031-7.476562-7.339844-13.261719-16.226563-16.953125-26.035157-3.632812-9.347656-6.121094-20.035156-6.832031-35.679687-.722656-15.679687-.890625-20.6875-.890625-60.609375s.167969-44.929688.886719-60.605469c.710937-15.648437 3.195312-26.332031 6.828125-35.683593 3.691406-9.808594 9.480468-18.695313 16.960937-26.035157 7.339844-7.480469 16.226563-13.265625 26.035157-16.957031 9.351562-3.632812 20.035156-6.117188 35.683593-6.832031 15.675781-.714844 20.683594-.886719 60.605469-.886719s44.929688.171875 60.605469.890625c15.648437.710937 26.332031 3.195313 35.683593 6.824219 9.808594 3.691406 18.695313 9.480468 26.039063 16.960937 7.476563 7.34375 13.265625 16.226563 16.953125 26.035157 3.636719 9.351562 6.121094 20.035156 6.835938 35.683593.714843 15.675781.882812 20.683594.882812 60.605469s-.167969 44.929688-.886719 60.605469zm0 0"/>
                    </svg>
                </a>
            @endisset
            @isset($userinfo->facebook)
                <a class="d-inline-block mr-2" href="{{ $userinfo->facebook }}" target="_blank">
                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="30px" viewBox="0 0 512 512" width="30px" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#212121" d="m512 256c0-141.4-114.6-256-256-256s-256 114.6-256 256 114.6 256 256 256c1.5 0 3 0 4.5-.1v-199.2h-55v-64.1h55v-47.2c0-54.7 33.4-84.5 82.2-84.5 23.4 0 43.5 1.7 49.3 2.5v57.2h-33.6c-26.5 0-31.7 12.6-31.7 31.1v40.8h63.5l-8.3 64.1h-55.2v189.5c107-30.7 185.3-129.2 185.3-246.1z"/>
                    </svg>
                </a>
            @endisset
            @isset($userinfo->linkedin)
                <a class="d-inline-block" href="{{ $userinfo->linkedin }}" target="_blank">
                    <svg height="30px" viewBox="0 0 512 512" width="30px" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#212121" d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm-74.390625 387h-62.347656v-187.574219h62.347656zm-31.171875-213.1875h-.40625c-20.921875 0-34.453125-14.402344-34.453125-32.402344 0-18.40625 13.945313-32.410156 35.273437-32.410156 21.328126 0 34.453126 14.003906 34.859376 32.410156 0 18-13.53125 32.402344-35.273438 32.402344zm255.984375 213.1875h-62.339844v-100.347656c0-25.21875-9.027343-42.417969-31.585937-42.417969-17.222656 0-27.480469 11.601563-31.988282 22.800781-1.648437 4.007813-2.050781 9.609375-2.050781 15.214844v104.75h-62.34375s.816407-169.976562 0-187.574219h62.34375v26.558594c8.285157-12.78125 23.109375-30.960937 56.1875-30.960937 41.019531 0 71.777344 26.808593 71.777344 84.421874zm0 0"/>
                    </svg>
                </a>
            @endisset
        </div>
    </div>
</div>