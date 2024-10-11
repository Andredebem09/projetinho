@extends('layout')

@section('corpo')


<div class="container">
    

    <h1>nova duvida</h1>
            <form action="{{ route('index.postados')}}" method="POST">
                <!-- <input type="hidden" value="{{csrf_token()}}" name="_token">  -->
                @csrf() 
                <p>coloque a duvida</p>
                <input class="form-control" type="text" placeholder="Nome" name="nome_pessoa">
                <br>
                <p>Assunto:</p>
                <textarea class="form-control  "name="duvida" cols="30" placeholder= "Descrição"> </textarea>
                <br>
                <p>Descreva:</p>
                <textarea class="form-control" name="detalhe" cols="30" placeholder= "Descrição"> </textarea>
                <br>
                <input type="file" name="imagem" class="form-control">
                <br>
                <button type="submit">enviar</button>

                <a href="{{route('index.site')}}" class="btn btn-outline-info">Voltar</a>


                
                
            </form>

            
    
    </div>
    
@endsection









