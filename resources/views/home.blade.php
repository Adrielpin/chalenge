@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload de arquivo</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="col-md-6">
                        
                        @csrf
                        <div class="setting"></div>
                        <div class="setting image_picker">
                            <h2>Arraste e solte o arquivo</h2>
                            
                            <div class="settings_wrap">
                                
                                <form action="{{ route('xml.store') }}" method="POST" files="true" enctype="multipart/form-data">
                                    
                                    @csrf

                                    <label class="drop_target">
                                        <input id="inputFile" type="file" name="inputFile" accept="text/xml"/>
                                    </label>
                                    @if ($errors->has('inputFile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    
                                    <div class="settings_actions vertical">
                                        <span><i class="fa fa-file-o"></i> <strong class="filename">Arquivo.xml</strong></span>
                                        <a class="disabled" data-action="remove_current_image"><i class="fa fa-ban"></i> Remover arquivo atual</a>
                                    </div>
                                    
                                    <div class="row">
                                        <button type="submit">Salvar</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
@endsection
