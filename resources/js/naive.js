import {
    create,
    NButton,
    NCard,
    NInput,
    NModal,
    NNotificationProvider,
    NForm,
    NFormItem,
    NInputNumber,
    NPagination,
    NSelect,
    NDropdown,
    NDrawer,
    NDrawerContent,
} from "naive-ui";

export const createNaiveUi = () => {
    return create({
        components: [
            NButton,
            NCard,
            NInput,
            NModal,
            NNotificationProvider,
            NForm,
            NFormItem,
            NInputNumber,
            NPagination,
            NSelect,
            NDropdown,
            NDrawer,
            NDrawerContent,
        ],
    });
};
