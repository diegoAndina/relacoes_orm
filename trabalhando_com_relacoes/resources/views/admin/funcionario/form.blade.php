<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    <label for="nome" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control" name="nome" type="text" id="nome" value="{{ isset($funcionario->nome) ? $funcionario->nome : ''}}" >
    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cpf') ? 'has-error' : ''}}">
    <label for="cpf" class="control-label">{{ 'Cpf' }}</label>
    <input class="form-control" name="cpf" type="text" id="cpf" value="{{ isset($funcionario->cpf) ? $funcionario->cpf : ''}}" >
    {!! $errors->first('cpf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('salario') ? 'has-error' : ''}}">
    <label for="salario" class="control-label">{{ 'Salario' }}</label>
    <input class="form-control" name="salario" type="number" id="salario" value="{{ isset($funcionario->salario) ? $funcionario->salario : ''}}" >
    {!! $errors->first('salario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('situacao') ? 'has-error' : ''}}">
    <label for="situacao" class="control-label">{{ 'Situacao' }}</label>
    <div class="radio">
    <label><input name="situacao" type="radio" value="1" {{ (isset($funcionario) && 1 == $funcionario->situacao) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="situacao" type="radio" value="0" @if (isset($funcionario)) {{ (0 == $funcionario->situacao) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('situacao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data_contratacao') ? 'has-error' : ''}}">
    <label for="data_contratacao" class="control-label">{{ 'Data Contratacao' }}</label>
    <input class="form-control" name="data_contratacao" type="date" id="data_contratacao" value="{{ isset($funcionario->data_contratacao) ? $funcionario->data_contratacao : ''}}" >
    {!! $errors->first('data_contratacao', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data_demissao') ? 'has-error' : ''}}">
    <label for="data_demissao" class="control-label">{{ 'Data Demissao' }}</label>
    <input class="form-control" name="data_demissao" type="date" id="data_demissao" value="{{ isset($funcionario->data_demissao) ? $funcionario->data_demissao : ''}}" >
    {!! $errors->first('data_demissao', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
