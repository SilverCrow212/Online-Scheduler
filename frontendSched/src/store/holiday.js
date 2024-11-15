import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const holidayInput = defineStore('holidayInput', () => {
    const setHoliday= ref({
        date:null,
        description:null,
    });
    const resetHolidayInput = () => {
        setHoliday.value = {
            date: null,
            description: null,
        };
    };

    return { setHoliday, resetHolidayInput };
});