import moment from 'moment';
import _ from 'lodash';

let displayPercentage = (number) => (number * 100).toFixed(1).replace('.', ',');

let displayAverage = (number) => (number * 1).toFixed(1).replace('.', ',');

/**
    * Determine if the given date is in the future.
    */
let dateInTheFuture = (date) => {
    return moment().diff(moment(date + ' Z'), 'minutes') < 0;
};


/**
    * Show the time ago format for the given time.
    */
let timeAgo = (time) => {
    return moment(time + ' Z').utc().local().fromNow();
};

/**
    * Truncate the given string.
    */
let truncate = (string, length = 70) => {
    return _.truncate(string, {
        'length': length,
        'separator': /,? +/
    });
};

export { 
    displayAverage, 
    displayPercentage, 
    dateInTheFuture, 
    timeAgo,
    truncate
};

