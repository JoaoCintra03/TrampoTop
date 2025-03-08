let express = require('express')

let app = express();

const PORT = 3001;

app.get('/', (requisicao, resposta) => {
    resposta.send('Site Trampo Top =)')
})

app.listen(PORT, () => {
    console.log('servidor executando na porta ' + PORT)
})
