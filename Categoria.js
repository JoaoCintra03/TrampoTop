const Sequelize = require('sequelize')
const db = require('./../db/conexao')

const Categoria = db.define('categorias', {
    nome: {
        type: Sequelize.STRING
    }
})

module.exports = Categoria