// Este script deve ser importado no seu componente Blade
// import Chart from 'chart.js/auto';

export function generateUsersPerMonthChart(usersPerMonthData) {
    // const usersPerMonthData = @json($usersPerMonth);
    console.log("usersPerMonthData", usersPerMonthData);

    // const ctx = document.getElementById('usersPerMonthChart').getContext('2d');

    const labels = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const finalData = Array(12).fill(0);

    // Preencher os dados com a quantidade de utilizadores por mês
    usersPerMonthData.forEach(item => {
        finalData[item.month - 1] = item.total;
    });


    const currentMonth = new Date().getMonth();
    const monthsToFill = currentMonth + 1;
    const dataToShow = finalData.slice(0, monthsToFill);

    const finalMonthData = [
        ...dataToShow,
        ...Array(12 - monthsToFill).fill(0)
    ];

    const ctx = document.getElementById('usersPerMonthChart').getContext('2d');

    const data = {
        labels: labels.slice(0, monthsToFill),
        datasets: [{
            label: 'Users',
            data: finalMonthData,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4
        }]
    };

    const usersPerMonthChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
};

// Adicione esta linha para tornar a função disponível globalmente
window.generateUsersPerMonthChart = generateUsersPerMonthChart;