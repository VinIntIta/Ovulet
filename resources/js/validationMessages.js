export const validationMessages = {
  desktop: {
    prevCycleStart: {
      required: "Будь ласка оберіть дату",
      date: "Поле повинно містити дату",
      dateIsNotFuture: "Не можна обирати майбутні дати"
    }
  },
  mobile: {
    day: {
      required: "Оберіть день",
      min: "Мінімально допустиме значення 1",
      max: "Максимально допустиме значення 31",
    },
    month: {
      required: "Оберіть місяць",
      min: "Мінімально допустиме значення 1",
      max: "Максимально допустиме значення 12",
    },
    year: {
      required: "Оберіть рік",
      min: `Мінімально допустиме значення ${parseInt(new Date().getFullYear(), 10 - 1)}`,
      max: `Максимально допустиме значення ${parseInt(new Date().getFullYear(), 10)}`,
    },
    prevCycleStart: {
      date: "Оберіть день місяць і рік",
      dateIsNotFuture: "Не можна обирати майбутні дати",
      dateIsValid: "Обрана дата не коректна"
    }
  }
}
