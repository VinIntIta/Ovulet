export const validationMessages = {
  desktop: {
    prevCycleStart: {
      required: "Будь ласка оберіть дату",
      date: "Поле повинно містити дату",
      selectedDateIsOk: "Оберіть коректну дату"
    }
  },
  mobile: {
    day: {
      required: "Оберіть день",
      min: "Мінімально допустиме значення 1",
      max: "Максимально допустиме значення 31",
      dateIsValid: "Оберіть коректний день"
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
  }
}
