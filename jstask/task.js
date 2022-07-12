var usersArr = [
    { username: 'Jan Kowalski', birthYear: 1983, salary: 4200 },
    { username: 'Anna Nowak', birthYear: 1994, salary: 7500 },
    { username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000 },
    { username: 'Piotr Kozak', birthYear: 2000, salary: 4999 },
    { username: 'Marek Sinica', birthYear: 1989, salary: 7200 },
    { username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800 },
];

/**
 * This method logs a message to the console checking for person salary firstly and then for whether person year is divisible by 2, method logs another message.
 * @param array array - array of users
 */

function welcomeUsers(array) {
    const year = new Date().getFullYear();
    array.forEach(person => {
        if (person.salary > 15000) {
            console.log('Witaj prezesie!');
        } else if (person.salary < 5000) {
            console.log(person.username + ', szykuj się na podwyżkę!');
        } else if (person.birthYear % 2 == 0) {
            console.log('Witaj, ' + person.username + '! W tym roku kończysz ' + (year - person.birthYear) + ' lat!');
        } else if (person.birthYear % 2 != 0) {
            console.log(person.username + ', jesteś zwolniony');
        }
    });
}

welcomeUsers(usersArr);