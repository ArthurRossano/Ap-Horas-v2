document.addEventListener("DOMContentLoaded", function () {

    // Adiciona evento de escuta para o campo de horaFim
    document.getElementById("hFim").addEventListener("input", function () {
        calcularTotalHoras();
    });

    // Adiciona evento de escuta para o campo de horaInicio (caso o usuário edite)
    document.getElementById("hIni").addEventListener("input", function () {
        calcularTotalHoras();
    });

    // Função para calcular e exibir o total de horas
    function calcularTotalHoras() {
        // Implemente a lógica para calcular o total de horas
        const horaInicio = new Date(`2024-01-03T${document.getElementById("hIni").value}`);
        const horaFim = new Date(`2024-01-03T${document.getElementById("hFim").value}`);
        const diffHoras = (horaFim - horaInicio) / 1000; // Diferença em segundos
        const horas = Math.floor(diffHoras / 3600);
        const minutos = Math.floor((diffHoras % 3600) / 60);
        const segundos = Math.floor(diffHoras % 60);

        // Preenche automaticamente o campo de total de horas
        const totalHorasFormatado = `${String(horas).padStart(2, '0')}:${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
        document.getElementById("totHoras").value = totalHorasFormatado;
    }

    // Manipulação do formulário de lançamento de horas
    const formularioHoras = document.getElementById("lancamentoHorasForm");

});

document.addEventListener("DOMContentLoaded", function () {
    // Manipulação do formulário de lançamento de horas
    const formularioHoras = document.getElementById("lancamentoHorasForm");

    // Implemente a lógica para calcular o total de horas
    const horaInicio = new Date(`2024-01-03T${document.getElementById("hIni").value}`);
    const horaFim = new Date(`2024-01-03T${document.getElementById("hFim").value}`);
    const diffHoras = (horaFim - horaInicio) / 3600000; // Conversão para horas

    // Preenche automaticamente o campo de total de horas
    document.getElementById("totHoras").value = diffHoras.toFixed(2); // Exibindo com duas casas decimais

});