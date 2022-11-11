<div>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            @if (session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="p-5 text-bg-dark rounded-3">
                <form wire:submit.prevent="submit" class="form-inline">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="mt-2">Símbolo da Ação</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control @error('symbol') is-invalid  @enderror" wire:model="symbol" placeholder="Ex: AAPL" style="text-transform: uppercase">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mb-2 btn-block" {{ $can_submit ? '' : '' }}>Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @error('symbol')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-5 bg-light border rounded-3">
                @if($stockPriceResponse)
                    <h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                        </svg>
                        {{$stockPriceResponse->companyName}}
                        <b class="text-{{($stockPriceResponse->change < 0) ? 'danger' : 'success'}}">
                            {{number_format($stockPriceResponse->latestPrice, 2)}}
                            {{$stockPriceResponse->currency}}
                            ({{number_format($stockPriceResponse->change, 2)}}%)
                        </b>
                    </h2>
                    <p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                Última atualização <b style="float:right">{{date('d/m/Y H:i:s', strtotime($stockPriceResponse->latestUpdate))}}</b>
                            </li>
                            <li class="list-group-item">
                                Corretora principal <b style="float:right">{{$stockPriceResponse->primaryExchange}}</b>
                            </li>
                            <li class="list-group-item">
                                Marketcap <b style="float:right">{{number_format($stockPriceResponse->marketCap, 2)}} {{$stockPriceResponse->currency}}</b>
                            </li>
                            <li class="list-group-item">
                                Média de Volume <b style="float:right">{{number_format($stockPriceResponse->avgTotalVolume, 2)}} {{$stockPriceResponse->currency}}</b>
                            </li>
                        </ul>
                    </p>
                    <small class="text-muted">Fonte: <a href="https://iexcloudaio" target="_blank">IEX</a></small>
                @else
                    @if($loadingResult == true)
                    <h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                          </svg>
                        Carregando
                    </h2>
                    <p>Buscando pela ação informada...</p>
                    @else
                    <h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Resultado
                    </h2>
                    <p>O resultado da sua busca aparecerá aqui.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
