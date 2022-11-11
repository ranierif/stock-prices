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
                                <input type="text" class="form-control @error('symbol') is-invalid  @enderror" wire:model="symbol" placeholder="Ex: AAPL">
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
            <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
            </div>
        </div>
    </div>
</div>
