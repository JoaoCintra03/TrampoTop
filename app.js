let express = require('express')
const db = require('./db/conexao.js')

let app = express();

const PORT = 3001;

db.authenticate()
.then (() => {
    console.log('Conectou ao Banco de Dados')
})
.catch((erro) =>{
    console.log('Erro ao conectar no banco')
    console.log(erro)
})

app.use('/categorias', require('./routes/categorias'))

app.listen(PORT, () => {
    console.log('Servidor executando na porta ' + PORT)
})
