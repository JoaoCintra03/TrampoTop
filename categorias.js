const express = require('express')
const Categoria = require('./../models/Categoria')

const router = express.Router()

// http://localhost:3001/categorias
router.get('/', (requisicao, resposta) => {
    resposta.send('Site Trampo top do Brasil!!!!')
})

// inserir os dados
router.post('/', (requisicao, resposta) => {
    let objSalvar = {
        nome: 'Santana'
    }
    Categoria.create(objSalvar)
        .then(() => {
            resposta.send('Cadastro a categoria')
        })
        .catch((erro) => {
            console.log(erro)
            resposta.send('Deu Erro :/')
        })
})

module.exports = router