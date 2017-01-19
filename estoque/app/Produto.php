<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	// Caso queira mudar o nome padrão da tabela, basta usar o campo abaixo:
    //protected $table = 'produtos';

/* Ao usar o orm eloquent para salvar dados é preciso especificar quais tipos de campos da tabela poderão ser populados usando o 
fiilable e quais não podem usando o guarded */

protected $fillable = array('nome','descricao', 'valor', 'quantidade');
protected $guarded = ['id'];
	
	}
